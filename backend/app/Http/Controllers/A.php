

POST http://127.0.0.1:8000/api/persons
{
  "people_id": 12345,
  "tipo_documento": "cedula de ciudadania",
  "nombres_completos": "Juan Pérez",
  "correo": "juan.perez@example.com",
  "qr_code_path": "path/to/qrcode.png",
  "lugar_expedicion": "Bogotá",
  "primer_apellido": "Pérez",
  "segundo_apellido": "Gómez",
  "fecha_nacimiento": "1990-01-01",
  "nacionalidad": "Colombiana",
  "sexo": "masculino"
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


http://127.0.0.1:8000/api/emergency

{
  "people_id": 1234567,
  "blood_type": "O+",
  "contact_name": "María Pérez",
  "contact_phone": "3001234567",
  "contact_relationship": "Hermana"
}



Para poder hacer el envio de informacion tiene que usar el localhost y poner la api que quiere meter o sacar informacion

ejemplo basico 

import React, { useState } from 'react';
import axios from 'axios';

const CreatePerson = () => {
  const [formData, setFormData] = useState({
    people_id: '',
    tipo_documento: '',
    nombres_completos: '',
    correo: '',
    qr_code_path: '',
    lugar_expedicion: '',
    primer_apellido: '',
    segundo_apellido: '',
    fecha_nacimiento: '',
    nacionalidad: '',
    sexo: '',
  });

  const [responseMessage, setResponseMessage] = useState('');
  const [errorMessage, setErrorMessage] = useState('');

  // Manejar cambios en los campos del formulario
  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  // Manejar el envío del formulario
  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      // Realizar solicitud POST con Axios, si necesita enviar a otro endpoint se cambia aca
      const response = await axios.post('http://127.0.0.1:8000/api/persons', formData, {
        headers: {
          'Content-Type': 'application/json',
        },
      });
      setResponseMessage(response.data.message);
      setErrorMessage('');
    } catch (error) {
      setErrorMessage(error.response?.data?.error || 'Error al enviar los datos');
      setResponseMessage('');
    }
  };
  


  return (
    <div>
      <h2>Crear Persona</h2>
      <form onSubmit={handleSubmit}>
        <div>
          <label>People ID:</label>
          <input
            type="number"
            name="people_id"
            value={formData.people_id}
            onChange={handleChange}
            required
          />
        </div>
        <div>
          <label>Tipo de Documento:</label>
          <select
            name="tipo_documento"
            value={formData.tipo_documento}
            onChange={handleChange}
            required
          >
            <option value="">Seleccione...</option>
            <option value="registro civil">Registro Civil</option>
            <option value="tarjeta de identidad">Tarjeta de Identidad</option>
            <option value="cedula de ciudadania">Cédula de Ciudadanía</option>
            <option value="cedula de extranjeria">Cédula de Extranjería</option>
            <option value="permiso especial de permanencia">Permiso Especial de Permanencia</option>
          </select>
        </div>
        <div>
          <label>Nombres Completos:</label>
          <input
            type="text"
            name="nombres_completos"
            value={formData.nombres_completos}
            onChange={handleChange}
            required
          />
        </div>
        <div>
          <label>Correo:</label>
          <input
            type="email"
            name="correo"
            value={formData.correo}
            onChange={handleChange}
          />
        </div>
        <div>
          <label>QR Code Path:</label>
          <input
            type="text"
            name="qr_code_path"
            value={formData.qr_code_path}
            onChange={handleChange}
          />
        </div>
        <div>
          <label>Lugar de Expedición:</label>
          <input
            type="text"
            name="lugar_expedicion"
            value={formData.lugar_expedicion}
            onChange={handleChange}
          />
        </div>
        <div>
          <label>Primer Apellido:</label>
          <input
            type="text"
            name="primer_apellido"
            value={formData.primer_apellido}
            onChange={handleChange}
            required
          />
        </div>
        <div>
          <label>Segundo Apellido:</label>
          <input
            type="text"
            name="segundo_apellido"
            value={formData.segundo_apellido}
            onChange={handleChange}
          />
        </div>
        <div>
          <label>Fecha de Nacimiento:</label>
          <input
            type="date"
            name="fecha_nacimiento"
            value={formData.fecha_nacimiento}
            onChange={handleChange}
          />
        </div>
        <div>
          <label>Nacionalidad:</label>
          <input
            type="text"
            name="nacionalidad"
            value={formData.nacionalidad}
            onChange={handleChange}
          />
        </div>
        <div>
          <label>Sexo:</label>
          <select
            name="sexo"
            value={formData.sexo}
            onChange={handleChange}
            required
          >
            <option value="">Seleccione...</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
          </select>
        </div>
        <button type="submit">Enviar</button>
      </form>

      {/* Mostrar mensaje de éxito o error */}
      {responseMessage && <p style={{ color: 'green' }}>{responseMessage}</p>}
      {errorMessage && <p style={{ color: 'red' }}>{errorMessage}</p>}
    </div>
  );
};

export default CreatePerson;
