

POST http://127.0.0.1:8000/api/persons
{
  "people_id": 1234567,
  "tipo_documento": "cedula de ciudadania",
  "nombres_completos": "Juan Carlos Pérez",
  "correo": "juan.perez@example.com",
  "genero": "Masculino",
  "qr_code_path": "ruta/qr/codigo.png",
  "lugar_expedicion": "Bogotá",
  "primer_apellido": "Pérez",
  "segundo_apellido": "Gómez",
  "fecha_nacimiento": "1990-05-15",
  "nacionalidad": "Colombiana"
}

http://127.0.0.1:8000/api/contacts

{
  "contact_id": 1, 
  "people_id": 1234567,
  "telefono_principal": "1234567890",
  "telefono_secundario": "0987654321",
  "correo_electronico": "contacto@example.com",
  "direccion_residencia": "Calle 123, Ciudad",
  "municipio": "Medellín",
  "barrio_vereda": "El Poblado",
  "comuna_corregimiento": "14"
}

http://127.0.0.1:8000/api/differential-focus

{
  "people_id": 1234567,
  "focus_name": "reintegrado",
  "grupo_etnico": "Negro",
  "acreditacion_grupo_etnico": "Certificado de pertenencia",
  "certificado_discapacidad": true,
  "tipo_discapacidad": "Visual",
  "cuidador_cuidadora": false,
  "campesino_campesina": true,
  "victima_conflicto": true,
  "reincorporacion_reintegracion": false,
  "madre_cabeza_familia": false,
  "madre_gestante_lactante": false,
  "sisben": "A"
}


http://127.0.0.1:8000/api/formation-occupations

{
  "people_id": 1234567,
  "nivel_academico": "Primaria",
  "ocupacion": "Empleado privado",
  "nombre_empresa": "TechCorp"
}


http://127.0.0.1:8000/api/emergency-contacts

{
  "people_id": 1234567,
  "blood_type": "O+",
  "contact_name": "María Pérez",
  "contact_phone": "3001234567",
  "contact_relationship": "Hermana"
}
