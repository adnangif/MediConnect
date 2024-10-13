<?php

namespace App\Enums;


enum DoctorSpecializations: string
{
    case CARDIOLOGIST = 'Cardiologist';
    case DERMATOLOGIST = 'Dermatologist';
    case NEUROLOGIST = 'Neurologist';
    case PEDIATRICIAN = 'Pediatrician';
    case PSYCHIATRIST = 'Psychiatrist';
    case ONCOLOGIST = 'Oncologist';
    case ORTHOPEDIC_SURGEON = 'Orthopedic Surgeon';
    case ENDOCRINOLOGIST = 'Endocrinologist';
    case GASTROENTEROLOGIST = 'Gastroenterologist';
    case PULMONOLOGIST = 'Pulmonologist';
    case NEPHROLOGIST = 'Nephrologist';
    case UROLOGIST = 'Urologist';
    case OPHTHALMOLOGIST = 'Ophthalmologist';
    case OB_GYN = 'Obstetrician/Gynecologist (OB/GYN)';
    case RHEUMATOLOGIST = 'Rheumatologist';
    case HEMATOLOGIST = 'Hematologist';
    case ALLERGIST_IMMUNOLOGIST = 'Allergist/Immunologist';
    case ENT = 'Otolaryngologist (ENT)';
    case RADIOLOGIST = 'Radiologist';
    case PLASTIC_SURGEON = 'Plastic Surgeon';
    case ANESTHESIOLOGIST = 'Anesthesiologist';
    case INFECTIOUS_DISEASE_SPECIALIST = 'Infectious Disease Specialist';
    case PATHOLOGIST = 'Pathologist';
    case FAMILY_MEDICINE_PHYSICIAN = 'Family Medicine Physician';
    case GERIATRICIAN = 'Geriatrician';
    case PODIATRIST = 'Podiatrist';
    case SPORTS_MEDICINE_DOCTOR = 'Sports Medicine Doctor';


    public static function toArray(): array
    {
        return array_column(DoctorSpecializations::cases(), 'value');
    }
}
