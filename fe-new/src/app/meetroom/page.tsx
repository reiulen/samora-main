import Shape from '@/components/Shape'
import Image from 'next/image';
import React from 'react'
import img_meet from './../../assets/meetroom.png'
import { IoIosArrowDropdown } from "react-icons/io";

export default function page() {
  return (
    <section className="pt-3">
      <Shape size="w-2/12" />
      <h2 className="font-Gilroy font-bold text-2xl text-biru py-3">
        MEETING ROOM BOOKING
      </h2>
      <div className="lg:flex mt-5 bg-gray-200">
        <Image
          className="lg:w-7/12 object-cover"
          src={img_meet}
          alt="gambar"
        />
        <div className="lg:w-5/12 lg:flex lg:flex-col lg:justify-center lg:gap-3 m-3 pb-3">
          <div className="flex items-center gap-2 bg-white p-3 w-8/12 mx-auto">
            <h5 className="text-biru font-Gilroy font-bold text-lg">
              Meeting Room HO
            </h5>
            <IoIosArrowDropdown size={30} color="#1e3a8a" />
          </div>
          <div className="flex items-center gap-2 bg-white p-3 w-8/12 mx-auto">
            <h5 className="text-biru font-Gilroy font-bold text-lg">
              Tanggal
            </h5>
            <IoIosArrowDropdown size={30} color="#1e3a8a" />
          </div>
          <div className="flex items-center gap-2 bg-white p-3 w-8/12 mx-auto">
            <h5 className="text-biru font-Gilroy font-bold text-lg">
              Jam
            </h5>
            <IoIosArrowDropdown size={30} color="#000371" />
          </div>
          <div className="flex items-center justify-center mt-5 gap-2 bg-biru p-3 w-8/12 mx-auto">
            <h5 className="font-Gilroy font-bold text-white text-lg text-center">
              ENTER
            </h5>
          </div>
        </div>
      </div>
    </section>
  );
}
