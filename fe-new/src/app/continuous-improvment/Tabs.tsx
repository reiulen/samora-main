import Shape from "@/components/Shape";
import React from "react";

const titles = ["Submit Ide Perbaikan", "COPM Document", "Refrensi Ide Perbaikan", "Lainnya"]

export default function Tabs() {
  return (
    <div className="grid grid-cols-2 justify-between pt-20 gap-3">
      {titles.map((d) => (
        <section key={d} className="p-5 w-11/12 bg-gray-200">
          <Shape size="w-2/12" />
          <h3 className="text-biru text-2xl font-Gilroy font-bold pt-3">
            {d}
          </h3>
        </section>
      ))}
    </div>
  );
}
