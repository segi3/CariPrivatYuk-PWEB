import cv2
import sys

def opcv(file):
    # load cascade
    face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')

    # read input image
    img = cv2.imread('../berkas/foto_tutor/'+file)

    # convert to grayscale
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

    # detect faces
    faces = face_cascade.detectMultiScale(gray, 1.2, 4)

    # Draw rectangle
    # for (x, y, w, h) in faces:
    #     cv2.rectangle(img, (x, y), (x+w, y+h), (255, 0, 0), 2)
    
    nface = len(faces)

    # cv2.imwrite('result.jpg', img)

    return nface

faces = opcv(sys.argv[1])
print(faces)