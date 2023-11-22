import Shape from "@/components/Shape";
import Image from "next/image";
import React from "react";
import she_cover from "./../../assets/SHE-COVER.png";
import PurposeTab from "@/app/she/PurposeTab";
import Site from "@/app/she/Site";

export default function page() {
  return (
    <section className="py-3">
      <Shape size="w-2/12" />
      <h2 className="text-xl text-biru lg:text-3xl font-Gilroy font-bold pt-3">
        SAFETY, HEALTY AND ENVIRONMENT
      </h2>
      <div className="h-[50vh] overflow-hidden pt-5">
        <Image src={she_cover} alt="she cover" className="w-full" />
      </div>
      <p className="text-sm text-biru font-Gilroy font-normal lg:pt-5 lg:text-xl">
        In line with SAMORA GROUP'S corporate values, we emphasize the
        importance of safety, health and environmental protection in all
        operational aspects as SAMORA GROUP'S by recalling "Five steps to
        safety".
      </p>
      <h2 className="text-xl text-biru font-Gilroy font-bold lg:text-2xl py-5">
        The five steps towards surviving :
      </h2>
      <p className="text-base text-biru font-Gilroy font-normal lg:text-xl">
        Have a healthy physique to do work <br />
        Understand the risks that will occur when carrying out work <br />
        Take action to reduce the harm that may occur <br />
        Wearing the correct personal protective equipment for the job <br />
        Use the correct equipment to do the job.
      </p>
      <h2 className="text-base text-biru font-Gilroy font-bold lg:text-2xl mt-4 mb-3">
        Our Purpose
      </h2>
      <p className="text-base text-biru font-Gilroy font-normal lg:text-xl mb-5 lg:pe-10">
        We continue to work to provide benefits to the nation. society and the
        environment in which we operate. Realizing hope through the best
        dedication for indonesia.
      </p>
      <div className="grid grid-cols-2 justify-between">
        <PurposeTab title="SHE COMMIT" />
        <PurposeTab title="SHE ARTICLE" />
        <PurposeTab title="SHE REGULATIONS" />
        <PurposeTab title="SHE CERTIFICATE" />
      </div>
      <Site />
    </section>
  );
}
