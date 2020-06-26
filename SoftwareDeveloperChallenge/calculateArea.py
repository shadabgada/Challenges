def calculateArea(coordinates,point):

    coordinates.sort(key = lambda coordinates: coordinates[0][0]) 
    # sort data based on the x co-ordinate of data
    
    area = 0
    width = 0
    firstBuilding=True
   
    for building in coordinates:
        curHeight = abs( building[0][1] - building[1][1] )
        width = abs( building[0][0] - building[3][0] )
        if(firstBuilding==True):
            area = area + curHeight + width
            m = (coordinates[0][0][1] - point[1])/(coordinates[0][2][0] - point[0]) # Slope of ray light
            #print(m)
            firstBuilding=False
        else:
            c = point[1] - m*point[0] # c = y - mx  #line formula
            rayPoint = m*building[0][0] + c # y = mx + c => line formula
            if(rayPoint <= building[0][1]): #if ray falls on buildings height
                area = area + building[0][1] - rayPoint
            else: # if ray falls on building and crosses it
                area = area + building[0][1] - rayPoint + width
            
    print(area)
            
        
#calculateArea([[[4,0],[4,-5],[7,-5],[7,0]], [[0.4,-2],[0.4,-5],[2.5,-5],[2.5,-2]]],[-3.5,1])
calculateArea([[[4,0],[4,-5],[7,-5],[7,0]]],[1,1])
