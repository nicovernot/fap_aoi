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
  return (
    <table {...getTableProps()} className="table table-dark" style={{ border: 'solid 1px blue' }}>
      <thead>
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
  )
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