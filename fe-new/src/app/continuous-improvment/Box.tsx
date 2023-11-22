import Image from 'next/image';
import React from 'react'

export default function Box(p: {nama: string, jabatan: string, image: string}) {
  return (
    <div className="p-5 text-center">
      <div className="w-52 h-52 mx-auto relative overflow-hidden rounded-full bg-slate-200">
        <Image src={p.image} alt='leader' width={1000} height={1000}/>
      </div>
      <p className="font-Gilroy font-bold text-biru text-xl pt-3">
        {p.nama}
      </p>
      <span className="font-Gilroy font-normal ">{p.jabatan}</span>
    </div>
  );
}
