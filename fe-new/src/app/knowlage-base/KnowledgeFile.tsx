import Link from 'next/link';
import React from 'react'

interface KnowledgeFileProps {
  id: number;
  legal: string;
  title: string;
  path: string;
}

export default function KnowledgeFile(p: { file: KnowledgeFileProps }) {
  return (
    <section className="flex flex-row justify-start bg-white border-b-4 pb-1 border-yellow-400 w-11/12 px-3">
      <h2 className="font-Gilroy font-bold text-xl text-biru py-3 w-4/12">
        {p.file.legal.toUpperCase()}
      </h2>
      <h2 className="font-Gilroy font-bold text-xl text-biru py-3 w-6/12">
        {p.file.title.toUpperCase()}
      </h2>
      <div className="flex flow-row items-center py-2 justify-between w-2/12">
        <Link
          target="_blank"
          href={p.file.path}
          className="font-Gilroy font-bold text-biru"
        >
          LIHAT
        </Link>
        <div className="w-1 h-full bg-kuning"></div>
        <Link
          target="_blank"
          href={p.file.path}
          className="font-Gilroy font-bold text-biru"
        >
          UNDUH
        </Link>
      </div>
    </section>
  );
}
