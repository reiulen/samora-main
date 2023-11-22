// CommunicationFile.tsx
import Link from "next/link";
import React from "react";

interface CorporateCommunicationData {
  id: number;
  title: string;
  type: string;
  path: string;
}

interface CommunicationFileProps {
  file: CorporateCommunicationData;
}

export default function CommunicationFile({ file }: CommunicationFileProps) {
  return (
    <section className="flex flex-row justify-start bg-white border-b-4 pb-1 border-yellow-400 w-11/12 px-3">
      <h2 className="font-Gilroy font-bold text-lg text-biru py-3 w-4/12">
        {file ? file.type.toUpperCase() : "Jenis File"}
      </h2>
      <h2 className="font-Gilroy font-bold text-lg text-biru py-3 w-6/12">
        {file ? file.title.toUpperCase() : "Nama File"}
      </h2>
      <div className="flex flow-row items-center py-2 justify-between w-2/12">
        <Link
          target="_blank"
          href={file ? file.path : "#"}
          className="font-Gilroy font-bold text-biru"
        >
          LIHAT
        </Link>
        <div className="w-1 h-full bg-kuning"></div>
        <Link
          target="_blank"
          href={file ? file.path : "#"}
          className="font-Gilroy font-bold text-biru"
        >
          UNDUH
        </Link>
      </div>
    </section>
  );
}
