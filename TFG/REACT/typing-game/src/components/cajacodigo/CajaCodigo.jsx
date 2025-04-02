import "bootstrap/dist/css/bootstrap.min.css";
import "./CajaCodigo.css";
import { useState } from "react";

{/* Botones y modal */}
const CajaCodigo = (props) => {
  {/* Estado para mostrar el modal */}
  const [showModal, setShowModal] = useState(false);

  return (
    <div className="container-fluid">
      <div className="row justify-content-center">
        {/* Area de texto */}
        <div className="col-md-5 mt-5">
          <textarea
            className="form-control bg-warning caja-codigo"
            cols={60}
            rows={20}
            placeholder={props.codigo}
          ></textarea>
        </div>

        {/* Botones */}
        <div className="col-md-5 align-items-center justify-content-center d-flex flex-column gap-3">
          {/* Boton que cambia el estado de modal para ser mostrado */}
          <button className="btn btn-danger" onClick={() => setShowModal(true)}>
            Lenguaje de programacion
          </button>
          <div className="gap-3 d-flex">
            <button className="btn btn-danger">Modo</button>
            <button className="btn btn-danger">Codigo Roto</button>
            <button className="btn btn-danger">Modo IA</button>
          </div>

          {/* Modal */}
          {showModal && (
            <div className="modal show d-block" tabIndex="-1">
              <div className="modal-dialog modal-lg">
                <div className="modal-content bg-info">
                  <div className="modal-header">
                    <h5 className="modal-title">¿Qué lenguaje quieres practicar?</h5>
                    <button
                      className="btn-close"
                      onClick={() => setShowModal(false)}
                    ></button>
                  </div>
                  <div className="modal-body gap-3 d-flex">
                    <button className="btn btn-danger">HTML</button>
                    <button className="btn btn-danger">CSS</button>
                    <button className="btn btn-danger">JavaScript</button>
                    <button className="btn btn-danger">PHP</button>
                    <button className="btn btn-danger">JAVA</button>
                    <button className="btn btn-danger">Python</button>
                    <button className="btn btn-danger">C#</button>
                  </div>
                  <div className="modal-footer">
                    <button
                      className="btn btn-secondary"
                      onClick={() => setShowModal(false)}>
                      Cerrar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          )}

          {/* Botones de sonido */}
          <div className="row g-2 mt-1 d-flex">
            <div className="col-6 justify-content-center d-flex">
              <button className="btn btn-danger">Sound off</button>
            </div>
            <div className="col-6 justify-content-center d-flex">
              <button className="btn btn-danger">Sound on</button>
            </div>
            <div className="col-6 justify-content-center d-flex">
              <button className="btn btn-danger">Settings</button>
            </div>
            <div className="col-6 justify-content-center d-flex">
              <button className="btn btn-danger">Font</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default CajaCodigo;
