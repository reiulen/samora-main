import React from "react";
import Shape from "./Shape";
import Image from "next/image";
import Link from "next/link";
import { IoIosArrowDropright } from "react-icons/io";

async function getData() {
  const res = await fetch("http://127.0.0.1:8000/api/news", {
    cache: "no-cache",
  });

  if (!res.ok) {
    // This will activate the closest `error.js` Error Boundary
    throw new Error("Failed to fetch data");
  }

  return res.json();
}

export default async function LatesNews() {
  const { data } = await getData();
  function Article() {
    return (
      <div className="mb-5 text-[#000371]">
        <Image
          src="/blog-img.png"
          width={1000}
          height={1000}
          alt="gambar"
          className="w-full"
        />
        <h2 className="text-xl my-2 font-Gilroy font-bold">
          Samora Berbagi 2020 Peduli Masyarakat Terdampak Covid 19
        </h2>
        <p className="mb-3 text-sm font-Gilroy font-normal">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora
          praesentium iure incidunt ipsam quaerat eveniet quae quas explicabo
          eligendi quis!
        </p>
        <Link
          href="#"
          className="flex items-center gap-1 font-Gilroy font-bold lg:justify-end lg:text-base"
        >
          <span>Read More</span>
          <IoIosArrowDropright size={20} />
        </Link>
      </div>
    );
  }

  return (
    <section className="pt-10">
      <Shape size="w-1/12" />
      <h2 className="font-Gilroy font-bold text-4xl text-biru py-3">
        Lates News
      </h2>
      <div className="mt-3 grid grid-cols-2 gap-5">
        {data.map((d: any) => (
          <Article />
        ))}
      </div>
    </section>
  );
}
