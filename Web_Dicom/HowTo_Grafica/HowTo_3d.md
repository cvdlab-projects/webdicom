# **WebDicom- Project**

- - -

##HowTo_3d:

###### The application need a server (es. Apache) to run. The easiest way to use the app is:

-  Connect to http://www.dicom-standard.it/
-  Alternatively, download the code from the code folder
-  Download and install xampp 
-  Put code in xampp/htdocs/
-  Run xampp controll and start apache
-  From browser (firefox) 127.0.0.1

 - - -


### The application aims to

#### Build 3d models from a stack of images dicom


- - -

####Load Stack of image:

### Upload and view stack of dicom images  :

####- This is the index page of the project

####- From this page, using the botton "Open" you can load one or more image dicom.

#### - The "slide_files" botton is usefull for show all images that you load

#### - The scroll bar gives you the possibility to choose between the images loaded

#### - For each image you choose you may push "Add to Array 3D" botton

 

![image](img/1_screen_graf.jpg)

- - - 

### Denoising/Quantizzation/Pseudocolor :


#### - After push image in the array you may run some filter on image by pushing "Denoise/Quantizzation" botton

#### - Loaded image has already been applied a "fast blur" filter

#### - You can choose the level of color quantizzation using the scrooll bar

#### - After that you may choose your "palette" for map grayscale in pseudocolor raynbow 



![image](img/2_screen_graf.jpg)

### Create_3D

#### -By checking the botton indicated from green indicator you can obtain the python coordinate for 3D computation  

![image](img/3_screen_graf.jpg)


### ScreenShoot

#### - Here are some sample from an array of 4 slice

![image](img/gr7.jpg)

![image](img/gr8.jpg)


![image](img/gr9.jpg)


- - -



