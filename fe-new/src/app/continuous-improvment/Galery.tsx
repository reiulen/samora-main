"use client";
import Shape from "@/components/Shape";
import React, { useEffect, useState } from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/css";
import "swiper/css/pagination";
import Image from "next/image";

export default function Galery() {
  const [data, setData] = useState([]);

  const extractVideoId = (url: any) => {
    const match = url.match(
      /(?:youtu\.be\/|youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/|youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=))([^"'&?\/\s]{11})/
    );
    return match && match[1];
  };

  useEffect(() => {
    const fetchData = async () => {
      try {
        const res = await fetch("http://127.0.0.1:8000/api/gallery", {
          cache: "no-cache",
        });

        if (!res.ok) {
          throw new Error("Failed to fetch data");
        }

        const result = await res.json();
        setData(result.data);
      } catch (error: any) {
        console.error("Error fetching data:", error.message);
      }
    };

    fetchData();
  }, []);

  return (
    <section className="pt-10">
      <Shape size="w-1/12" />
      <h2 className="text-xl mb-5 text-biru lg:text-3xl font-Gilroy font-bold pt-3">
        GALLERY
      </h2>
      {/* SLIDER */}
      <Swiper slidesPerView={3} spaceBetween={10} className="mySwiper">
        {data.map((d: any) => (
          <SwiperSlide key={d.id}>
            <div className="p-3 border-2">
              <div className="h-48 w-full relative overflow-hidden bg-slate-200 mb-3">
                {d.type === "photo" ? (
                  <Image
                    alt="thumbnail"
                    src={`http://127.0.0.1:8000/storage/gallery/${d.url}`}
                    width={1000}
                    height={1000}
                    className="h-full"
                  />
                ) : (
                  <iframe
                    src={`https://www.youtube.com/embed/${extractVideoId(
                      d.url
                    )}`}
                    className="h-full"
                    title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowFullScreen
                  ></iframe>
                )}
              </div>
              <p className="font-Gilroy font-bold text-xl text-biru">
                {d.title}
              </p>
            </div>
          </SwiperSlide>
        ))}
      </Swiper>
    </section>
  );
}
