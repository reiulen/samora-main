import Shape from '@/components/Shape'
import React from 'react'
import Box from './Box';

async function getData() {
  const res = await fetch("http://127.0.0.1:8000/api/leader");
  // The return value is *not* serialized
  // You can return Date, Map, Set, etc.

  if (!res.ok) {
    // This will activate the closest `error.js` Error Boundary
    throw new Error("Failed to fetch data");
  }

  return res.json();
}

export default async function OurLeader() {
  const {data} = await getData()
  return (
    <section>
      <Shape size="w-2/12" />
      <h2 className="font-Gilroy font-bold text-3xl text-biru py-3">
        OUR LEADER
      </h2>
      <div className="grid grid-cols-3 pe-10">
        {data.map((d: any, index: number) => (
          <Box key={index} image={d.image} nama={d.name} jabatan={d.title} />
        ))}
      </div>
    </section>
  );
}
