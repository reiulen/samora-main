import Image from 'next/image';
import React from 'react'

async function getData() {
  const res = await fetch("http://127.0.0.1:8000/api/headline", {cache: "no-cache"});

  if (!res.ok) {
    // This will activate the closest `error.js` Error Boundary
    throw new Error("Failed to fetch data");
  }

  return res.json();
}

export default async function HomeSectionMain() {
  const { data } = await getData();
  return (
    <section
      className={`h-[50vh] md:h-[40vh] lg:h-[60vh] relative pt-10 lg:ps-10 overflow-hidden`}
    >
      <Image
        className="w-full h-full bg-cover absolute left-0 top-0 -z-10"
        src={data[0].image}
        alt={data[0].title}
        width={1000}
        height={1000}
      />
      <div className="h-3 w-14 lg:w-20 bg-yellow-400 absolute top-3 left-3 lg:top-5 lg:left-10"></div>
      <h2 className="text-xl bg-slate-400 w-max text-white lg:text-3xl font-Gilroy font-bold">
        {data[0].title}
      </h2>
      <p className="text-sm text-white bg-slate-500 absolute left-0 bottom-2 p-2 lg:ps-10 lg:pe-3  lg:text-xl font-Gilroy font-normal w-full">
        {data[0].content}
      </p>
    </section>
  );
}
