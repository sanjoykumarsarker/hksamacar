#include <iostream>
 

using namespace std;

template <typename T>
 T  Max(T a, T  b) { 
   return ( a < b) ? b:a; 
}

int main () {
   int i = 39;
   int j = 20;
   cout<<Max(i, j) ;


   return 0;
}
