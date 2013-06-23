# WEBDICOM
---


![DICOM icon](http://www.uiowa.edu/hri/dicomLogo.jpg)

---

## ACR-NEMA Standard

The ACR-NEMA standard was developed jointly by ACR (the American College of Radiology) and NEMA (the National Electrical Manufacturers Association).

The ACR-NEMA standard was originally published in 1985, and an updated version, ACR-NEMA 2.0, was published in 1988. The goal of the standard was provide a vendor-independent set of rules for exchanging digital medical images.  One limitation of ACR-NEMA was that it was defined for point-to-point connections only, rather than from use in a network environment.

The third version of the standard, released in 1993, was renamed to DICOM.

---

## THE DICOM STANDARD


The **DICOM** Standard (*Digital Imaging and Communications in Medicine*) is an evolution of the ACR-NEMA Standard the embodies a number of major enhancements respect the previous versions:
 
1. It is applicable to a networked environment, and supports TCP/IP protocol. 

2. It is applicable to an off-line media environment and supports operation in an off-line media environment.

3. It specifies how devices claiming conformance to the Standard react to commands and data being exchanged, the semantics of commands and associated data. 

4. It specifies levels of conformance and explicitly describes how an implementor must structure a Conformance Statement to select specific options. 

5. It is structured as a multi‑part document. 

6. It introduces explicit Information Objects not only for images and graphics but also for waveforms, reports, printing, etc.

7. It specifies an established technique for uniquely identifying any Information Object.

---

The DICOM Standard facilitates interoperability of medical imaging equipment by specifying: 

*	For network communications: a set of protocols to be followed by devices claiming conformance to the Standard.
The syntax and semantics of Commands and associated information which can be exchanged using these protocols.

* For media communication: a set of media storage services to be followed by devices claiming conformance to the Standard, as well as a File Format and a medical directory structure to facilitate access to the images and related information stored on interchange media.

The DICOM Standard does not specify:
 
*	The implementation details of any features of the Standard on a device claiming conformance.
*	The overall set of features and functions to be expected from a system implemented by integrating a group of devices each claiming DICOM conformance. 
*	A testing/validation procedure to assess an implementation's conformance to the Standard. 

The DICOM Standard pertains to the field of Medical Informatics. Within that field, it addresses the exchange of digital information between medical imaging equipment and other systems. 


---


##jsDICOM


The original [jsDICOM][id1] implementation was taken from [infogosoft][id2] company, and it's a Dicom library and viewer written in javascript.

[id1]: https://github.com/Infogosoft/jsdicom#jsdicom "jsDICOM original implementation"

[id2]: http://www.infogosoft.com/ "infogosoft website"


The **visualization** is done with WebGL and the pixel data is converted to a WebGL texture. Different fragment shaders are used for different photometric interpretations.

For the **browser-support**, any WebGL-enabled browser should work. Browsing local files works from Firefox OOTB, Chrome needs to be started with --allow-file-access-from-files.

jsDICOM is *GPL-licensed*.

---

#THE WEBDICOM PROJECT

---

##Steps

###1. From jsDICOM code to DICOM image visulization 
###2. Segmentation
###3. Block Decomposition
---
##STEP 1: From jsDICOM code to DICOM image visulization 
######*Authors : Fabio Mastromatteo - Serena Sforza*

* Analysis and comprehension of the jsDICOM original implementation's code. 
* Code lightening
* Addition of some utility functions

---
##Interactions:
![image1](http://i39.tinypic.com/sczvqx.png)

---
###STEP 2. Segmentation

- - -
## Border Discovery

![image_3](https://raw.github.com/cvdlab-cg/442999/master/progetto/seg_image/border_discorvery1.jpg)

- - -

## Edge tracker

![image_1](https://raw.github.com/cvdlab-cg/442999/master/progetto/seg_image/trackingedge1.jpg)
- - -

## Region growing for edge detection

![image_1](https://raw.github.com/cvdlab-cg/442999/master/progetto/seg_image/RegionGrowing_1.jpg)
- - -
![image_2](https://raw.github.com/cvdlab-cg/442999/master/progetto/seg_image/Seconda_Grown_2.jpg)
- - -

## Image 2 segment algoritm


![image_3](https://raw.github.com/cvdlab-cg/442999/master/progetto/seg_image/finale_1.jpg)
- - -
![image_4](https://raw.github.com/cvdlab-cg/442999/master/progetto/seg_image/finale_2.jpg)
###STEP 3. Block Decomposition
