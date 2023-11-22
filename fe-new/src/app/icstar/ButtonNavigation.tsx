import React from "react";
import { IoIosArrowDropleft, IoIosArrowDropright } from "react-icons/io";
import { useSwiper } from "swiper/react";

export default function ButtonNavigation() {
  const swiper = useSwiper();
  return (
    <div className="flex items-center justify-end mt-3">
      <button onClick={() => swiper.slidePrev()}>
        <IoIosArrowDropleft size={60} color="#000371" />
      </button>
      <button onClick={() => swiper.slideNext()}>
        <IoIosArrowDropright size={60} color="#000371" />
      </button>
    </div>
  );
}
