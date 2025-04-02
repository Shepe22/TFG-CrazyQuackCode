import React, { useState } from 'react';

const GameLayout = () => {
  const [fragmento, setFragmento] = useState('');
  const [mostrarOpciones, setMostrarOpciones] = useState(false);
  const [error, setError] = useState(null);

  const obtenerFragmento = async (lenguaje) => {
    try {
      const respuesta = await fetch(`http://localhost:8000/index.php/lenguaje/${lenguaje}`);

      if (!respuesta.ok){
        throw new Error("Error, no se ha podido obetener el fragmento de código");
      }
      const data = await respuesta.json();
      // Solo actualizamos el estado con fragmentoCodigo
      setFragmento(data.fragmentoCodigo);
      setError(null);
      
    } catch (err) {
      console.log("Error al obtener el fragmento:", err);
      setError("No se pudo obtener el fragmento de código. Inténtalo de nuevo");
    }
  };

  const handleLenguajeClick = (lenguaje) => {
    setMostrarOpciones(false);
    obtenerFragmento(lenguaje);
  };

  return (
    <div style={{
      display: 'flex',
      justifyContent: 'space-between',
      alignItems: 'flex-start',
      padding: '2rem',
      maxWidth: '1000px',
      margin: '0 auto',
    }}>

      {/* Cuadro de código a escribir */}
      <div style={{
        width: '60%',
        padding: '1rem',
        border: '2px solid #ccc',
        borderRadius: '8px',
        fontFamily: 'monospace',
        backgroundColor: '#f9f9f9',
        minHeight: '200px',
        whiteSpace: 'pre-wrap',
        overflow: 'auto',
      }}>
        <p>{fragmento || '// Aquí aparecerá el código a escribir'}</p>
        {error && <p style={{ color: 'red' }}>{error}</p>}
      </div>

      {/* Botón de lenguajes + opciones */}
      <div style={{ width: '35%', textAlign: 'right' }}>
        <button
          onClick={() => setMostrarOpciones(!mostrarOpciones)}
          style={{
            padding: '0.5rem 1rem',
            fontSize: '1rem',
            cursor: 'pointer',
            borderRadius: '5px',
            backgroundColor: '#007bff',
            color: 'white',
            border: 'none',
            marginBottom: '1rem',
          }}
        >
          Elige tu lenguaje
        </button>

        {mostrarOpciones && (
          <div style={{ background: '#eee', padding: '0.5rem', borderRadius: '5px' }}>
            <button onClick={() => handleLenguajeClick('html')}>HTML</button><br />
            <button onClick={() => handleLenguajeClick('php')}>PHP</button><br />
            <button onClick={() => handleLenguajeClick('js')}>JS</button>
          </div>
        )}
      </div>
    </div>
  );
};

export default GameLayout;
