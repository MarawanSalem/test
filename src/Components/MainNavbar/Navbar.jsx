import React, { useState } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBars } from '@fortawesome/free-solid-svg-icons';

export default function Navbar() {
  const [isOpen, setIsOpen] = useState(false); // State to manage dropdown visibility

  const handleDropdownClick = () => {
    setIsOpen(!isOpen); // Toggle dropdown visibility on click
  };

  return (
    <>
      <div className="mainnav">
        <div className="container-fluid">
          <div className="d-flex justify-content-between w-100 align-items-center">
            <img src="Nyla_Logo.svg" className="logo-width navlogo" alt="" />

            <svg width="50" height="50" style={{ fill: 'green' }}> {/* Change color to green */}
              {/* Your Nyla_Logo.svg */}
            </svg>

            <div className="admin-side p-2 d-flex bg-white align-items-center justify-content-between rounded-pill">
              <FontAwesomeIcon icon={faBars} className="clickable" onClick={handleDropdownClick} /> {/* Clickable icon */}
              <img src="pro.jpg" className="w-50 rounded-circle" alt="" />
              {isOpen && ( // Conditionally render dropdown content
                <ul className="dropdown-menu">
                  <li onClick={() => { /* Handle logout logic */ }}>Logout</li>
                </ul>
              )}
            </div>
          </div>
        </div>
      </div>
    </>
  );
}
