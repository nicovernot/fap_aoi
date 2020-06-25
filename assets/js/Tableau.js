import React , { useState } from 'react'

import { useTable } from 'react-table'





function Table({ columns, data }) {
  // Use the state and functions returned from useTable to build your UI
  const {
    getTableProps,
    getTableBodyProps,
    headerGroups,
    rows,
    prepareRow,
  } = useTable({
    columns,
    data,
  })
  const [count, setCount] = useState(0);
 
  // Render the UI for your table
  return  data.length >0 ? (
    <table {...getTableProps()} className="table alert-secondary" >
      <thead className="thead-dark">
        {headerGroups.map(headerGroup => (
          <tr {...headerGroup.getHeaderGroupProps()}>
            {headerGroup.headers.map(column => (
              <th
                {...column.getHeaderProps()}
              
              >
                {column.render('Header')}
              </th>
            ))}
          </tr>
        ))}
      </thead>
      <tbody {...getTableBodyProps()}>
        {rows.map(row => {
          prepareRow(row)
        
          return (
            <tr {...row.getRowProps()}>
              {row.cells.map(cell => {
                return (
                
                  <td
                  {...cell.getCellProps()}
                  >
                    {cell.render('Cell')}
                  </td>
                )
              })}
            </tr>
          )
        })}
      </tbody>
    </table>
  ) : (<div className="jumbotron jumbotron-fluid bg-info"><h1 className="texst-white text-center"> Pas d'infos pour cette page </h1></div>)
}

function Tableau(props) {
 const columns = props.columns
 const data = props.data 

  return (
   <div>

     <Table columns={columns} data={data} />
   </div>
 
  )
}

export default Tableau