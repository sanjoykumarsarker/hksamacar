#include <iostream>
using namespace std;


template <typename J> J m(J a,J b)

{


return (a>b)? a:b;


}

int main () {



int v=45;
int d=12;

cout<<m(v,d);


}
