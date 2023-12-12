import React from 'react'
import Shape from './Shape'
import Image from 'next/image';
import magazine from './../assets/magazine-cover.png'

export default function Magazine() {
  return (
    <section className='pt-5'>
      <Shape />
      <h2 className="font-Gilroy font-bold text-xl text-biru py-2">
        INTERNAL MAGAZINE
      </h2>
      <div className='pt-5'>
        <Image
            height={100}
            width={100}
            src={magazine}
            alt='magazine'
            className='w-full'
         />
      </div>
    </section>
  );
}
