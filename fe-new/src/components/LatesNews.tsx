import React from "react";
// import Shape from "./Shape";
// import Image from "next/image";
// import Link from "next/link";
// import { IoIosArrowDropright } from "react-icons/io";

// async function getData() {
//   const res = await fetch("http://127.0.0.1:8000/api/news", {
//     cache: "no-cache",
//   });

//   if (!res.ok) {
//     // This will activate the closest `error.js` Error Boundary
//     return [];
//   }

//   return res.json();
// }


export default async function LatesNews() {
  // const { data } = await getData();

  return (
    <section className="pt-10">
      {/* <Shape size="w-1/12" />
      <h2 className="font-Gilroy font-bold text-4xl text-biru py-3">
        Lates News
      </h2>
      <div className="mt-3 grid grid-cols-2 gap-5 overflow-hidden">
        {data ? (
          data.slice(0,2).map((d: any) => (
            <div className="mb-5 text-[#000371]">
              <Image
                src={d.thumbnail}
                width={1000}
                height={1000}
                alt="gambar"
                className="w-full h-[300px]"
              />
              <h2 className="text-xl my-2 font-Gilroy font-bold">{d.title}</h2>
              <div className="line-clamp-4 mb-2" dangerouslySetInnerHTML={{ __html: d.content }} />
              <Link
                href={`/news/${d.slug}`}
                className="flex items-center gap-1 font-Gilroy font-bold lg:justify-end lg:text-base pe-2"
              >
                <span>Read More</span>
                <IoIosArrowDropright size={20} />
              </Link>
            </div>
          ))
        ) : (
          <p>Gagal Mengambil data</p>
        )}
      </div> */}
    </section>
  );
}
