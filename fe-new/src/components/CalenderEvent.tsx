import React from 'react'
import Shape from './Shape'

async function getData() {
  const res = await fetch("http://127.0.0.1:8000/api/event", {cache: "no-cache"});
  // The return value is *not* serialized
  // You can return Date, Map, Set, etc.

  if (!res.ok) {
    // This will activate the closest `error.js` Error Boundary
    throw new Error("Failed to fetch data");
  }

  return res.json();
}

export default async function CalenderEvent() {
  const {data} = await getData()
  return (
    <section>
      <Shape />
      <h2 className="font-Gilroy font-bold text-xl text-biru py-2">
        CALENDER EVENT
      </h2>
      <div className="flex flex-col my-2">
        {data.map((d: any) => (
          <div
            key={d.event}
            className="flex items-center justify-between border-yellow-400 border-b-yellow-500 border-b-4 py-2 text-[#000371]"
          >
            <h4 className="font-Gilroy font-bold">{d.date} {d.month}</h4>
            <span className="font-Gilroy font-bold">{d.event}</span>
          </div>
        ))}
      </div>
    </section>
  );
}
