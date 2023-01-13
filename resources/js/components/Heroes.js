import React from "react";
import DataTable from "./DataTable";

function Heroes(){
    return (
        <div className="card">
            <div className="card-header">Heroes</div>
            <div className="card-body">
                <DataTable
                    fetchUrl="/api/heroes"
                    columns={["name", "health", "damage", "created_at"]}
                ></DataTable>
            </div>
        </div>
    )
}

export default Heroes;
