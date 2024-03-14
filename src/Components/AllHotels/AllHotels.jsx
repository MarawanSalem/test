import React from 'react'
import Navbar from '../MainNavbar/Navbar'
import { Outlet } from 'react-router-dom'

export default function AllHotels() {
    return <>
        <Navbar />
        <Outlet/>
    </>
    
}