import React from 'react'
import Shape from './Shape'

import { IoIosArrowDropright } from "react-icons/io";
import Link from "next/link";

async function getData() {
  const res = await fetch("http://127.0.0.1:8000/api/career", {
    cache: "no-cache",
  });

  if (!res.ok) {
    // This will activate the closest `error.js` Error Boundary
    return [];
  }

  return res.json();
}

export default async function CareerInfo() {
  const { data } = await getData();
  return (
    <section className="w-5/12">
      <Shape size="w-2/12" />
      <h2 className="font-Gilroy font-bold text-2xl text-biru py-3">
        CAREER INFO
      </h2>
      <div className="flex items-center bg-yellow-500 py-2 px-3 font-bold mb-3">
        <p className="w-8/12 font-Gilroy-extrabold lg:text-lg">POSISI</p>
        <p className="font-Gilroy-extrabold lg:text-lg">LOKASI</p>
      </div>
      {data ? data.map((item: any, index: number) => (
        <div
          key={index}
          className="flex items-center py-2 px-2 border-b-2 border-yellow-500"
        >
          <p className="w-8/12 font-Gilroy font-bold lg:text-lg text-[#000371]">
            {item.title}
          </p>
          <p className="lg:text-base font-Gilroy font-normal text-[#000371]">
            {item.location}
          </p>
        </div>
      )): <p>Gagal Mengambil data</p>}
      <Link
        href="#"
        className="flex items-center gap-1 justify-end lg:text-sm mr-3 mt-3"
      >
        <span className="font-Gilroy font-bold text-[#000371]">Read More</span>
        <IoIosArrowDropright size={20} color="#000371" />
      </Link>
    </section>
  );
}
