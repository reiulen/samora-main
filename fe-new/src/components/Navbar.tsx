"use client";
import Image from "next/image";
import Link from "next/link";
import React, { useState } from "react";
import logo from "./../assets/logo.png";
import { AiOutlineMenu, AiOutlineClose } from "react-icons/ai";

const navLinks = [
  {
    nama: "Home",
    href: "/",
  },
  {
    nama: "IC STAR",
    href: "/icstar",
  },
  {
    nama: "Corporate Document",
    href: "/corporate-document",
  },
  {
    nama: "Apps",
    href: "/",
  },
];

export default function Navbar() {
  const [open, setOpen] = useState(false);
  return (
    <nav className="flex items-center py-2 px-5 justify-between md:px-0 lg:py-5">
      <Link href="/">
        <Image
          src={logo}
          priority
          width={100}
          height={100}
          className="w-24 md:w-28 lg:w-30"
          alt="navbar"
        />
      </Link>
      <div
        className={`items-center gap-4 md:flex ${
          open
            ? "flex fixed z-10 flex-col bg-gray-200 left-0 w-[70%] top-0 pt-5 items-start text-left h-[100vh]"
            : "hidden"
        }`}
      >
        {navLinks.map((l) => (
          <Link
            key={l.nama}
            href={l.href}
            className="text-biru text-lg font-Gilroy font-bold lg:text-xl lg:mx-3"
          >
            {l.nama}
          </Link>
        ))}
      </div>

      {open ? (
        <AiOutlineClose
          onClick={() => setOpen(!open)}
          size={30}
          className="md:hidden"
        />
      ) : (
        <AiOutlineMenu
          onClick={() => setOpen(!open)}
          size={30}
          className="md:hidden"
        />
      )}
    </nav>
  );
}
