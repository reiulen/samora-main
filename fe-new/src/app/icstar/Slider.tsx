"use client";
import React from "react";
import { data } from "@/app/icstar/data";
import { SiNike } from "react-icons/si";
import { Swiper, SwiperSlide } from "swiper/react";
import ButtonNavigation from "./ButtonNavigation";

// Import Swiper styles
import "swiper/css";
// Import Swiper styles
import "swiper/css";

export default function Slider() {
  return (
    <section className="pt-10">
      <Swiper className="mySwiper" loop={true}>
        {data.map((d, index) => (
          <SwiperSlide key={index}>
            <div className="lg:pe-10">
              <h2 className=" text-biru font-Gilroy font-bold lg:text-2xl">
                {d.title}
              </h2>
              <p className="my-5 lg:text-xl text-biru font-Gilroy">{d.desc}</p>
              {d.ceklis.map((item: any, index: number) => (
                <div className="flex flex-row gap-2 mb-1" key={index}>
                  <div>
                    <SiNike size={30} color="#313289" />
                  </div>
                  <span className="lg:text-xl text-biru font-Gilroy font-normal">
                    {item}
                  </span>
                </div>
              ))}
            </div>
          </SwiperSlide>
        ))}
        <ButtonNavigation />
      </Swiper>
    </section>
  );
}
