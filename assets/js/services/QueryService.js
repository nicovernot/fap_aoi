const parent = "menus"
const parentquery = [ "id","mencom","menlib","menord","menphp","public"]
const fils = "ssmenus"
const filsquery = ["id","ssmlib","ssmord","ssmphp","ssmcom"]
const ptitfils = "onglet"
const ptfilsquery = ["id","onglib","ongord","ongsqlcre","ongsql","ongcom"]
const list = (list,query) => { 
 
  const q =`
{
  ${query} {
    edges {
      node{
       ${list},
      }
    }
  }
}
`
  return q }


  const filteredlist = (list,query,filter,filtervalue) => { 
 
    const q =`
  {
    ${query} (${filter}:"${filtervalue}") {
      edges {
        node{
         ${list},
        }
      }
    }
  }
  `
    return q }  

const genQuery = `
{
  ${parent} {
    edges {
      node {
        ${[...parentquery]},
        ${fils}{
          edges{
            node{
              ${[...filsquery]},
              ${ptitfils}{
                edges{
                  node{
                   ${ptfilsquery}
                   champs{
                    edges{
                      node{
                      id,
                      chplib,
                      chpcha,
                      chpord,
                      chpsel
                      chprec
                      chptyp  
                      }
                    }
                  }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
  `


const description = `
query introspectionType {

  __type(name: "Menu") {

   name
    kind
    fields {
      name
           
      type {
        name
        
      }
    }
  }

}
`

const schema = `
{
  __schema {
    types {
     
      name
      possibleTypes {
        name
      }
    }
  }
}
`

  export default {genQuery,list,filteredlist } ;
 