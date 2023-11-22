import React from 'react'
import Shape from './Shape'


import { BsInstagram, BsLinkedin } from "react-icons/bs";
import { TbWorldWww } from "react-icons/tb";

const sosialArray = [
  {
    nama: "@SamoraGroup",
    icon: BsInstagram,
  },
  {
    nama: "PT Samora Usaha Makmur",
    icon: BsLinkedin,
  },
  {
    nama: "samoragroup.co.id",
    icon: TbWorldWww,
  },
];

export default function SocialMedia() {
  return (
    <section className="mt-5">
      <Shape />
      <h2 className="font-Gilroy font-bold text-xl text-biru py-2">
        CORPORATE SOCIAL MEDIA
      </h2>
      <div className="pt-3">
        {sosialArray.map((item, index) => (
          <div
            key={index}
            className="flex flex-row items-center gap-2 text-[#000371] font-bold mb-3"
          >
            <item.icon size={40} />
            <span className="text-xl lg:text-lg font-Gilroy-extrabold">
              {item.nama}
            </span>
          </div>
        ))}
      </div>
    </section>
  );
}
