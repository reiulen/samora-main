import React from 'react'
import Shape from './Shape';

import { IoIosArrowDropright } from "react-icons/io";
import Link from 'next/link';
const dummy = [1, 2, 3];

export default function Announcement() {
  return (
    <section className="w-5/12">
      <Shape size="w-2/12" />
      <h2 className="font-Gilroy font-bold text-2xl text-biru py-3">
        ANNOUNCEMENT
      </h2>
      {dummy.map((item) => (
        <div
          key={item}
          className="mb-2 pb-1 border-b-2 border-yellow-500"
        >
          <p className="font-Gilroy font-normal">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione,
            error!
          </p>
          <Link
            href="#"
            className="flex items-center gap-1 justify-end lg:text-sm mr-3 mt-3"
          >
            <span className="font-Gilroy font-bold text-[#000371]">
              View More
            </span>
            <IoIosArrowDropright size={20} color="#000371" />
          </Link>
        </div>
      ))}
    </section>
  );
}
