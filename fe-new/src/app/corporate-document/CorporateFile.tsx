import Link from "next/link";
import React from "react";

export default function CorporateFile(p: { dataObj: any }) {
  return (
    <section className="flex flex-row justify-start bg-white border-b-4 pb-1 border-[#f3cd2d] w-11/12 px-3">
      <h2 className="font-Gilroy font-bold text-lg text-biru py-3 w-3/12">
        {p.dataObj.function.toUpperCase()}
      </h2>
      <h2 className="font-Gilroy font-bold text-lg text-biru py-3 w-2/12">
        {p.dataObj.type.toUpperCase()}
      </h2>
      <h2 className="font-Gilroy font-bold text-lg text-biru py-3 w-5/12">
        {p.dataObj.title.toUpperCase()}
      </h2>
      <div className="flex flow-row items-center py-2 justify-evenly w-2/12">
        <Link
          target="_blank"
          href={p.dataObj.path}
          className="font-Gilroy font-bold text-biru"
        >
          LIHAT | UNDUH
        </Link>
      </div>
    </section>
  );
}
