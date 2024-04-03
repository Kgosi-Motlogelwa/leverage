import csv

def convert_csv(input_file, output_file):
    with open(input_file, 'r') as csv_input, open(output_file, 'w', newline='') as csv_output:
        reader = csv.reader(csv_input)
        writer = csv.writer(csv_output)
        
        # Write header to the output file
        writer.writerow(['Code', 'Name', 'Polling_Districts'])
        
        # Skip the header row in the input file
        code = None
        polling_district = None
        constituencies = None
      

        for row in reader:
            if len(row[1]) > 1:
                constituencies = row[1]
                
            if len(row[3]) > 1:
                polling_district = row[3]

            if len(row[4]):
                writer.writerow([row[4], row[5], polling_district])
         
        
# Replace 'input.csv' and 'output.csv' with your file paths
input_file_path = 'c:/Users/komot/OneDrive/Documents/Github/Learning-Laravel/input.csv'
output_file_path = 'c:/Users/komot/OneDrive/Documents/Github/Learning-Laravel/polling_stations.csv'

convert_csv(input_file_path, output_file_path)
print("Conversion completed successfully!")