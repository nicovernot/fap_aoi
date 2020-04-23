const parent = "menus"
const parentquery = [ "id","mencom","menord","menphp"]
const fils = "ssmenus"
const filsquery = ["id","ssmlib","ssmord","ssmphp","ssmcom"]
const ptitfils = "onglet"
const ptfilsquery = ["id","onglib","ongord","ongsqlcre","ongsql"]
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

const qmag =`
{
  magazines {
    edges {
      node{
        id,
        image {
          filename,
         
                }
        ,presentation
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

  export default {genQuery,qmag,list } ;
 