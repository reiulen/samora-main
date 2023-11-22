import React from 'react'
import Image from 'next/image';
import Link from 'next/link';
import { BiSearch } from "react-icons/bi";
import Shape from './Shape';

async function getData() {
  const res = await fetch("http://127.0.0.1:8000/api/quick-link", {
    cache: "no-store",
  });
  // The return value is *not* serialized
  // You can return Date, Map, Set, etc.

  if (!res.ok) {
    // This will activate the closest `error.js` Error Boundary
    throw new Error("Failed to fetch data");
  }

  return res.json();
}

export default async function QuickLink() {

   const { data } = await getData();
  return (
    <section>
      <Shape />
      <h2 className="font-Gilroy font-bold text-xl text-biru py-2">QUICK LINK</h2>
      <div className="grid grid-cols-3 gap-1 pt-3">
        {data.map((item: any) => (
          <Link
            key={item.id}
            href={item.url}
            target={item.target === 0 ? "_self" : "_blank"}
            className="flex flex-col gap-1"
          >
            <Image
              width={100}
              height={100}
              priority
              alt={item.nama}
              src={item.icon}
              className="w-16"
            />
            <p className="font-bold text-base md:text-xs lg:text-sm text-[#000371] leading-3 font-Gilroy-extrabold">
              {item.nama}
            </p>
          </Link>
        ))}
      </div>
      <div className="py-1 px-2 border-2 border-yellow-500 rounded-3xl flex items-center justify-between lg:mt-3 mt-4 w-10/12 mx-auto lg:w-10/12 lg:mx-auto">
        <input
          type="text"
          placeholder="Seach.."
          className="p-2 w-full border-none outline-none text-lg md:text-sm text-biru"
        />
        <BiSearch size={25} />
      </div>
    </section>
  );
}
