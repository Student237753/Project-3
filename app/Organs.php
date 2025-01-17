<?php

namespace App;

enum Organs: string
{
    case Brain = 'Brain';
    case Heart = 'Heart';
    case Lungs = 'Lungs';
    case Esophagus = 'Esophagus';
    case Trachea = 'Trachea';
    case Colon = 'Colon';
    case SmallIntestine = 'Small Intestine';
    case Duodenum = 'Duodenum';
    case Rectum = 'Rectum';
    case Stomach = 'Stomach';
    case Liver = 'Liver';
    case Gallbladder = 'Gallbladder';
    case Kidneys = 'Kidneys';
    case Bladder = 'Bladder';
    case Uterus = 'Uterus';
    case Eyes = 'Eyes';
    case Ears = 'Ears';
    case Nose = 'Nose';
    case OralCavity = 'Oral cavity';
    case Pharynx = 'Pharynx';
    case Thyroid = 'Thyroid';
    case Pancreas = 'Pancreas';
    case SmallCirculatorySystem = 'Small Circulatory System';
    case BigCirculatorySystem = 'Big Circulatory System';
    case Aorta = 'Aorta';
    case Skin = 'Skin';
    case Ovaries = 'Ovaries';
    case Prostate = 'Prostate';
    case Testicles = 'Testicles';
    case Skeleton = 'Skeleton';
    case Pituitary = 'Pituitary';
    case LymphNodes = 'Lymph nodes';
    case NervousSystem = 'Nervous system';
    case Extremities = 'Extremities';
}
