#**Search and comparison of best available Dicom implementation in Python and Javascript**

---

##***Task Description***
Part of task:"Search and comparison of best available Dicom implementation in Python and Javascript"

The DICOM Standard (Digital Imaging and Communications in Medicine)is an evolution of the ACR-NEMA Standard the embodies a number of major enhancements respect the previous versions:
 
1. It is applicable to a networked environment.  DICOM supports operation in a networked environment the TCP/IP protocol. 

2. It is applicable to an off-line media environment and supports operation in an off-line media environment.

3. It specifies how devices claiming conformance to the Standard react to commands and data being exchanged. DICOM specifies, through the concept of Service Classes, the semantics of commands and associated data. 

4. It specifies levels of conformance and explicitly describes how an implementor must structure a Conformance Statement to select specific options. 

5. It is structured as a multi‑part document. 

6. It introduces explicit Information Objects not only for images and graphics but also for waveforms, reports, printing, etc.

7. It specifies an established technique for uniquely identifying any Information Object.

#####Fabio Mastromatteo [420076]

---

The DICOM Standard provides an overview of the entire Digital Imaging and Communications in Medicine (DICOM) Standard. It describes the history, scope, goals, and structure of the Standard. In particular, it contains a brief description of the contents of each part of the Standard. 
The DICOM Standard facilitates interoperability of medical imaging equipment by specifying: 

*	For network communications: a set of protocols to be followed by devices claiming conformance to the Standard.
The syntax and semantics of Commands and associated information which can be exchanged using these protocols.

* For media communication: a set of media storage services to be followed by devices claiming conformance to the Standard, as well as a File Format and a medical directory structure to facilitate access to the images and related information stored on interchange media.

The DICOM Standard does not specify:
 
*	The implementation details of any features of the Standard on a device claiming conformance.
*	The overall set of features and functions to be expected from a system implemented by integrating a group of devices each claiming DICOM conformance. 
*	A testing/validation procedure to assess an implementation's conformance to the Standard. 

The DICOM Standard pertains to the field of Medical Informatics. Within that field, it addresses the exchange of digital information between medical imaging equipment and other systems. 

For our studies we need to search and compare the best Dicom implementation in Python and Javascript.

#####Fabio Mastromatteo [420076]

---

##***Solutions Description***

>*The Dicom implementations in Python language*

* **PyDicom**

PyDicom is a pure Pythoon package for working with DICOM files. It was made for inspecting and modifying DICOM data in an easy way. The modifications can be written again to a new file. As a pure python package, it should run anywhere Python runs without any other requirements.

 It is designed to let you manipulate data elements in DICOM files with python code.

Limitations: The main limitation of the current version is that compressed pixel data (e.g. JPEG) cannot be altered in an intelligent way as it can for uncompressed pixels. Files can always be read and saved, but compressed pixel data cannot easily be modified.



#####Fabio Mastromatteo [420076]

---

* **Grassroots DICOM**

Grassroots DICOM (GDCM) is an implementation of the DICOM standard designed to be open source so that researchers may access clinical data directly. GDCM includes a file format definition and a network communications protocol, both of which should be extended to provide a full set of tools for a researcher or small medical imaging vendor to interface with an existing medical database.

It attempts to support all possible DICOM image encodings, namely:
RAW, JPEG lossy 8 & 12 bits (ITU-T T.81, ISO/IEC IS 10918-1), JPEG lossless 8-16 bits (ITU-T T.81, ISO/IEC IS 10918-1), JPEG 2000 reversible & irreversible (ITU-T T.800, ISO/IEC IS 15444-1), RLE, Deflated (compression at DICOM Dataset level), JPEG-LS (testing) (ITU-T T.87, ISO/IEC IS 14495-1), JPEG 2000 Multi-component reversible & irreversible (ISO/IEC IS 15444-2) (not supported for now), MPEG-2 (not supported for now).

GDCM is not aware of:

-->the Dicom network file exchange protocol (Query/Retrieve)

-->the Dicom media storage formats 

-->ANY OTHER PART of Dicom.

#####Fabio Mastromatteo [420076]

---

* **DICOM SDL**

DICOM SDL is a software developed libraries for easy and quick development of an application managing DICOM formatted files. DICOM SDL is written in C++ and it allows to make programs that read, modify, write DICOM formatted files without in depth knowledge of DICOM.

DICOM SDL provides an extension module for Python and you may build scripts with Python.

DICOM SDL can:

* read/modify/write DICOM formatted files.
* read/modify/write medical images in DICOM file, if file encodes in raw format, jpeg/jpeg2000 format.
DICOM SDL is especially optimized for reading lots of DICOM formatted files quickly, and would be very useful for scanning and processing huge numbers of DICOM files.

DICOM SDL cannot

* send/receive DICOM over network.
* read files encodes in RLE format and JPEG-LS format



#####Fabio Mastromatteo [420076]

---
