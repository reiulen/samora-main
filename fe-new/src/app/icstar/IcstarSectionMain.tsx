import React from "react";
import Shape from "../../components/Shape";
import image_icstar from "./../../assets/icstar.jpg";
import image_icstar2 from "./../../assets/icstar2.png";
import Image from "next/image";
import Slider from "./Slider";

export default function IcstarSectionMain() {
  return (
    <section className="p-3">
      <Shape size="w-2/12" />
      <h2 className="font-Gilroy font-bold text-3xl text-biru py-3">
        CORPORATE CULTURE
      </h2>
      <Image src={image_icstar} alt="ic star" className="w-10/12 mx-auto" />
      <p className="font-Gilroy font-normal pt-5 pb-10 text-xl">
        <strong className="text-[#000371]">
          Corporate Culture / Budaya organisasi
        </strong>{" "}
        Merupakan nilai - nilai bersama dalam suatu organisasi yang menjadi
        acuan bagaimana para pegawai melakukan kegiatan untuk mencapai tujuan
        atau cita - cita organisasi. Hal ini biasanya dinyatakan sebagai visi,
        misi dan tujuan organisasi. Budaya organisasi dikembangkan dari kumpulan
        norma - norma, nilai, keyakinan, harapan, asumsi, dan filsafat dari
        orang - orang didalamnya.
      </p>
      <Shape size="w-1/12" />
      <h2 className="font-Gilroy font-bold text-3xl text-biru py-3">IC STAR</h2>
      <Image src={image_icstar2} alt="ic star" className="w-10/12 mx-auto" />
      <Slider />
    </section>
  );
}
