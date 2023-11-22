import React from "react";
import Shape from "../../components/Shape";

export default function Site() {
  return (
    <section className="pt-10">
      <Shape size="w-1/12" />
      <h2 className="text-xl text-biru lg:text-3xl font-Gilroy font-bold pt-3">
        THE SAMORA SITE
      </h2>
      <div className="lg:grid lg:grid-cols-3 lg:gap-4 pt-3">
        <h3 className="text-biru text-lg font-Gilroy font-bold">
          PT SENTRA USAHATAMA JAYA
        </h3>
        <h3 className="text-biru text-lg font-Gilroy font-bold">
          PT MEDAN SUGAR INDUSTRI
        </h3>
        <h3 className="text-biru text-lg font-Gilroy font-bold">
          PT CATUR GLOBAL LOGISTIK
        </h3>
        <h3 className="text-biru text-lg font-Gilroy font-bold">
          PT ANDALAN FURNINDO
        </h3>
        <h3 className="text-biru text-lg font-Gilroy font-bold">
          PT SAMORA USAHA MAKMUR
        </h3>
      </div>
    </section>
  );
}
