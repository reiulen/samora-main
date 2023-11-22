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
            src={magazine}
            alt='magazine'
            className='w-full'
         />
      </div>
    </section>
  );
}
