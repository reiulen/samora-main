import React from 'react'
import Shape from './Shape'

import SUJ from "./../assets/subsidiaries/SUJ.png";
import AFI from "./../assets/subsidiaries/AFI.png";
import MSI from "./../assets/subsidiaries/MSI.png";
import SMS from "./../assets/subsidiaries/SMS.png";
import Link from 'next/link';
import Image from 'next/image';

const links = [
  {
    href: "https://www.sujsugar.com/",
    img: SUJ,
  },
  {
    href: "https://www.afsugar.com/",
    img: AFI,
  },
  {
    href: "https://www.msisugar.com/",
    img: MSI,
  },
  {
    href: "https://www.smsagro.com/",
    img: SMS,
  },
];

export default function Subsidiaries() {
  return (
    <section className="py-5">
      <Shape />
      <h2 className="font-Gilroy font-bold text-xl text-biru py-2">
        SUBSIDIARIES
      </h2>
      <div className="grid grid-cols-2 gap-1 pt-3">
        {links.map((item, index) => (
          <Link
            key={index}
            href={item.href}
            target="_blank"
            className="flex flex-col justify-center gap-2 text-center"
          >
            <Image
              width={1000}
              height={1000}
              alt={item.href}
              src={item.img}
              className="w-28 lg:w-40"
            />
          </Link>
        ))}
      </div>
    </section>
  );
}
