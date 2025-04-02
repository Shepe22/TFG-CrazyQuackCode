import logo from "./logo-pato.svg";
import "bootstrap-icons/font/bootstrap-icons.css";

const Navbar = () => {
  return (
    <nav className="navbar bg-light">
      <div className="d-flex justify-content-between align-items-center w-100 ">
        {/* Logo + Texto */}
        <div className="d-flex align-items-center">
          <img src={logo} alt="logo web" style={{ width: 100, height: 80 }} />
          <h1 className="ms-3">CrazyQuackCode</h1>
        </div>

        {/* Icono */}
        <div className="me-5 gap-3 d-flex">
          <div>
          <i className="bi bi-person fs-2"></i>
          </div>
          <div>
          <i class="bi bi-star fs-2"></i>
          </div>
          <div>
          <i class="bi bi-clock-history fs-2"></i>
          </div>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;
