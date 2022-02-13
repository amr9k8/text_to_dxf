<?php

/**
 * this function convert any text to dxf file
 * how it works ? 
 * 1) generate a svg file , 
 * 2) use inkscape version 9.2.5  to convert svg to eps file
 * 3) use pstoedit to convert eps file  to dxf file
 * Notes : 
 * # Inkscape verison 9.2.5 and pstoedit must be installed on the system and added to PATH
 * # using any ttf file are allowed but the new fonts better to be installed on the system before using it 
 * # for installing fonts in linux 
 *      1) move fonts files to font folder === > mv example.ttf usr/share/fonts/ 
 *      2) refresh fonts cache             === >   fc-cache -f -v 
 * # edit the exec() function in the code by replacing the current path of inkscape,pstoedit to your actual path
 */
function generatedxf($name,$font_size,$ttf_name)
{
    //.'_'.urlencode($ttf_name).'_'.urlencode($name).'
    //1) creating unique file names
    $filename = rand(1,50000).'_'.urlencode($ttf_name).'.svg';
    $epsfilename = rand(1,50000).'_'.urlencode($ttf_name).'.eps';
    $DXFfilename = rand(1,50000).'_'.urlencode($ttf_name).'.dxf';

    //2) create Svg content 
    $SVGData = "<?xml version='1.0' encoding='UTF-8' standalone='no' ?>
    <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
    <svg style='width: 100%; margin: 0 auto;background: #ffffff;' preserveAspectRatio='xMinYMid meet'>
    <text font-family='$ttf_name' fill='#000000' font-size='$font_size' y='0'>$name</text>
    </svg> ";

    //3) generate a svg file 
    file_put_contents($filename,$SVGData);

    //4) convert svg to eps using inkscrape --> Note : check the inkscape path
    $param = " -E $epsfilename $filename";
    exec('"D:\\Program Files\\Inkscape\\inkscape.exe"'.$param  , $output);

    //5) convert svg to eps using pstoedit
    exec('"D:\\Program Files\\pstoedit\\pstoedit.exe"'." -q  -dt -f  dxf:-polyaslines -mm  $epsfilename  dxfConverted\\$DXFfilename");
    
    //6) delete unnecessary files
    unlink($filename);
    unlink($epsfilename);

    //echo '"D:\\Program Files\\Inkscape\\inkscape.exe"'.$param;
    //echo '"D:\\Program Files\\pstoedit\\pstoedit.exe"'." -q  -dt -f  dxf:-polyaslines -mm  epsConverted\\$epsfilename  dxfConverted\\$DXFfilename";
}
if(isset($_POST['submit']))
{

    //Get Data
    $font_size = urlencode($_POST['font-size']);
    $ttf = $_POST['ttf'];
    $name = $_POST['name'];
    generatedxf($name , $font_size , $ttf);
    
    
}
?>
<!DOCTYPE html>    
<html lang="en">
    <head>
        <title>text_to_dxf</title>
    </head>
    <body>
        <div style="width:20%;margin:auto;border:1px solid black;height:300px;font-size:23px;text-align:center;padding:10px;background-color:#e6e6e6; margin-top:100px">
            <form action ="example.php" method = "post">
                <br><br>
                <label >name </label>
                <input type ="text" name="name"/>
                <br><br>
                <label>size </label>
                <input type ="text" name="font-size" placeholder="font size in px"/>
                <br><br>
                <select style=" margin-bottom:30px;with: 60%; border-radius: 25px; border: 1px solid #eee; min-width: 250px; height: 36px; padding: 5px; padding-left: 10px;" name="ttf" required>                          
                        <option value="none">Select:FontType</option>
                        <option value="claudia">claudia</option>
                        <option value="Simple Monologue DEMO">Simple Monologue</option>
                        <option value="Madelican">Madelican</option>
                        <option value="Angelina">Angelina</option>
                        <option value="Amsterdam">Amsterdam</option>
                </select>
                <button style="font-size:23px;" type= "submit" name="submit">submit</button>
            </form>
        </div>

    </body>

</html>