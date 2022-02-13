# text_to_dxf
a simple way to convert text in any font style to dxf file , for laser cutting and cnc machines
## how it works ? 
 1) generate a svg file , 
 2) use inkscape version 9.2.5  to convert svg to eps file
 3) use pstoedit to convert eps file  to dxf file
 ## Notes : 
  1) Inkscape verison 9.2.5 and pstoedit must be installed on the system and added to PATH
  2) using any ttf file are allowed but the new fonts better to be installed on the system before using it 
  3) for installing fonts in linux 
  4) move fonts files to font folder === > mv example.ttf usr/share/fonts/ 
  5) refresh fonts cache             === >   fc-cache -f -v 
  6) edit the exec() function in the code by replacing the current path of inkscape,pstoedit to your actual path
  7) unfortunatley this code doesn't work on windows due to some errors in pstoedit , so you have to run it on linux

# sample tests using diffrent fonts styles :

###  Amsterdam 
![image](https://github.com/amr9k8/text_to_dxf/blob/main/text-to-dxf-main%20php%20version/dxfConverted/samples/amsterdam.png)
###  Angelina 
![image](https://user-images.githubusercontent.com/61662153/116804487-6f070900-ab1f-11eb-907a-db7ae0c3520b.png)
###  Claudia  
![image](https://user-images.githubusercontent.com/61662153/116804487-6f070900-ab1f-11eb-907a-db7ae0c3520b.png)
###  Madelican
![image](https://user-images.githubusercontent.com/61662153/116804487-6f070900-ab1f-11eb-907a-db7ae0c3520b.png)
###  Monologue
![image](https://user-images.githubusercontent.com/61662153/116804487-6f070900-ab1f-11eb-907a-db7ae0c3520b.png)
