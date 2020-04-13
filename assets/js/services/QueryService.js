const parent = "menus"
const parentquery = [ "id","mencom","menord","menphp"]
const fils = "ssmenus"
const filsquery = ["id","ssmlib","ssmord","ssmphp"]
const ptitfils = "onglet"
const ptfilsquery = ["id","onglib","ongord"]
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
                      chpord,
                      chprec  
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
  export default genQuery ;