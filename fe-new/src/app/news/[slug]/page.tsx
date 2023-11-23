import Image from "next/image";
import React from "react";

async function getData(slug: string) {
  const res = await fetch(`http://127.0.0.1:8000/api/news/${slug}`, {
    cache: "no-cache",
  });

  if (!res.ok) {
    // This will activate the closest `error.js` Error Boundary
    return [];
  }

  return res.json();
}

export default async function Page({ params }: { params: { slug: string } }) {
  const { data } = await getData(params.slug);
  return (
    <div className="pt-10">
      <h1 className="text-2xl mb-4 font-Gilroy font-bold text-biru">{data.title}</h1>
      <Image
        src={data.thumbnail}
        width={1000}
        height={1000}
        alt="gambar"
        className="w-10/12 h-[400px]"
      />
      <div
        className="w-10/12 text-xl mt-5 text-biru font-Gilroy font-normal"
        dangerouslySetInnerHTML={{ __html: data.content }}
      />
    </div>
  );
}
